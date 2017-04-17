package edu.colorado.plv.CrimeMap;

import com.google.gson.JsonArray;

/**
 * Created by Pezh on 3/1/17.
 */
public class Crime {
    double mLatitude;
    double mLongitude;
    String mDate;
    String mCrimeType;
    String mStatus;
    String mLocation;
    String mCity = "NYC";

    public Crime(String date, String crimeType, String status, String location, double latitude, double longtitude){
        mDate = date;
        mCrimeType = crimeType;
        mStatus = status;
        mLocation = location;
        mLatitude = latitude;
        mLongitude = longtitude;
    }

    public Crime(JsonArray json){
        assert(json.size() == 31);
        mDate = (json.get(9).toString());
        mCrimeType = (json.get(15).toString());
        mStatus = (json.get(18).toString());
        mLocation = (json.get(19).toString());
        mLatitude =((JsonArray)json.get(21)).get(1).getAsDouble();
        mLongitude =((JsonArray)json.get(21)).get(2).getAsDouble();


    }





    public double getLatitude() {
        return mLatitude;
    }

    public void setLatitude(double mLatitude) {
        this.mLatitude = mLatitude;
    }

    public double getLongitude() {
        return mLongitude;
    }

    public void setLongitude(double mLongitude) {
        this.mLongitude = mLongitude;
    }

    public String getDate() {
        return mDate;
    }

    public void setDate(String mDate) {
        this.mDate = mDate;
    }

    public String getCrimeType() {
        return mCrimeType;
    }

    public void setCrimeType(String mCrimeType) {
        this.mCrimeType = mCrimeType;
    }

    public String getStatus() {
        return mStatus;
    }

    public void setStatus(String mStatus) {
        this.mStatus = mStatus;
    }

    public String getLocation() {
        return mLocation;
    }

    public void setLocation(String mLocation) {
        this.mLocation = mLocation;
    }



}
