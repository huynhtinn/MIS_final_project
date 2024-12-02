from flask import Flask, request, jsonify
import joblib
import numpy as np
import pandas as pd
import json

app = Flask(__name__)

# Load the pre-trained model (adjust the path as needed)
model = joblib.load('property_price_model.pkl')

@app.route('/predict', methods=['POST'])
def predict():
    data = request.json  # Get the JSON data sent from the frontend

    # Ensure that the input features match what the model expects
    # Extract the necessary features from the input
    # Add other features as necessary (like 'location', 'property_type', etc.)

    df = pd.DataFrame([{
        'property_type': data.get('property_type'),
        'size': data.get('size'),
        'location': data.get('location'),
        'bedrooms': data.get('bedrooms'),
        'bathrooms': data.get('bathrooms'),
        'year_built': data.get('year_built'),
        'floor': data.get('floor'),
        'near_transport': int(data.get('near_transport')),  # Convert boolean to integer
    }])

    # Simulating time slots for property prediction (e.g., every hour of the day)
    time_slots = [f"{i}:00" for i in range(24)]
    predicted_prices = []

    # Generate predictions for each time slot
    for time in time_slots:
        time_based_data = df.copy()
        time_based_data['hour'] = int(time.split(":")[0])  # Add hour to simulate time-based features
        predicted_prices.append(model.predict(time_based_data)[0])

    # Simulate the peak time prediction (based on hour with highest predicted price)
    peak_hour = time_slots[np.argmax(predicted_prices)]

    # Prepare the result to send back to the frontend
    result = {
        'predicted_prices': predicted_prices,
        'time_slots': time_slots,
        'peak_time': peak_hour
    }

    return jsonify(result)

if __name__ == '__main__':
    app.run(debug=True)