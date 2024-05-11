import requests
import pandas as pd
import random
import mysql.connector
from flask import Flask, request, jsonify, render_template

app = Flask(__name__, template_folder='.')

conn = mysql.connector.connect(
    host="localhost",
    user="root",
    database="havmate"
)


@app.route('/')
def index():
    return render_template('input.html')

def generate_dist_id():
    while True:
        dist_id_number = random.randint(1002, 9999)
        id = f"DBS{dist_id_number}"
        
        cursor = conn.cursor()
        cursor.execute("SELECT * FROM distributors WHERE Dist_id = %s", (id,))
        existing_id = cursor.fetchone()
        cursor.close()
        
        if not existing_id:  
            return id

def getLatLong(address):
    api_key = 'AIzaSyAl31BO-JdpTV1-3NK_GDvxqJX1VxBpHEM'
    url = f'https://maps.googleapis.com/maps/api/geocode/json?address={address}&key={api_key}'
    
    try:
        response = requests.get(url)
        data = response.json()
        
        if data['status'] == 'OK':
            latitude = data['results'][0]['geometry']['location']['lat']
            longitude = data['results'][0]['geometry']['location']['lng']
            return {'latitude': latitude, 'longitude': longitude}
        else:
            print("Failed to get coordinates:", data['status'])
            return {'latitude': None, 'longitude': None}
    except Exception as e:
        print("Error fetching coordinates:", str(e))
        return {'latitude': None, 'longitude': None}

def save_customer_data(cursor, conn, id, dist_name, dist_address, dist_phone, dist_email, website, purchase_needs, qty, purchase_price, dist_prod_name, dist_prod_desc, img_dist):
    cursor.execute("INSERT INTO distributors (Dist_id, Dist_Name, Dist_Address, Dist_Phone, Dist_Email, Website, Purchase_Needs, Qty, Purchase_Price, DistProd_Name, DistProd_Desc, img_dist) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", (id, dist_name, dist_address, dist_phone, dist_email, website, purchase_needs, qty, purchase_price, dist_prod_name, dist_prod_desc, img_dist))
    conn.commit()
    
def save_coordinates(cursor, conn, coords, dist_id):
    latitude = coords['latitude']
    longitude = coords['longitude']
    cursor.execute("INSERT INTO coordinate (Dist_id, Latitude, Longitude) VALUES (%s, %s, %s)", (dist_id, latitude, longitude))
    conn.commit()


@app.route('/submit_data', methods=['POST'])
def submit_data():
    id = generate_dist_id()
    dist_name = request.form.get('distName')
    dist_address = request.form.get('distAddress')
    dist_phone = request.form.get('distPhone')
    dist_email = request.form.get('distEmail')
    website = request.form.get('website')
    purchase_needs = request.form.get('purchaseNeeds')
    qty = request.form.get('qty')
    purchase_price = request.form.get('purchasePrice')
    dist_prod_name = request.form.get('distProdName')
    dist_prod_desc = request.form.get('distProdDesc')
    img_dist = request.form.get('imgDist')

    cursor = conn.cursor()
    try:
        save_customer_data(cursor, conn, id,dist_name, dist_address, dist_phone, dist_email, website, purchase_needs, qty, purchase_price, dist_prod_name, dist_prod_desc, img_dist)

        cursor.execute("SELECT id FROM distributors WHERE Dist_Address = %s", (dist_address,))
        dist_id = cursor.fetchone()[0]

        coords = getLatLong(dist_address)
        if coords['latitude'] is not None and coords['longitude'] is not None:
            save_coordinates(cursor, conn, coords, dist_id)
            conn.commit()
        else:
            print("Failed to fetch coordinates for:", dist_address)

        cursor.close()
        return jsonify({"success": True})
    except Exception as e:
        conn.rollback()
        cursor.close()
        return jsonify({"success": False, "error": str(e)})
    
if __name__ == '__main__':
    app.run(debug=True)
