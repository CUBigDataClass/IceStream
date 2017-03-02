package edu.colorado.plv.CrimeMap;

import com.google.gson.JsonArray;

/**
 * Created by Pezh on 3/1/17.
 */
public class Crime {
    double mLatitude;
    double mLongtitude;
    String mDate;
    String mCrimeType;
    String mStatus;
    String mLocation;

    public Crime(String date, String crimeType, String status, String location, double latitude, double longtitude){
        mDate = date;
        mCrimeType = crimeType;
        mStatus = status;
        mLocation = location;
        mLatitude = latitude;
        mLongtitude = longtitude;
    }

    public Crime(JsonArray json){
        assert(json.size() == 22);
        mDate = (json.get(8).toString());
        mCrimeType = (json.get(16).toString());
        mStatus = (json.get(18).toString());
        mLocation = (json.get(19).toString());
        mLatitude =((JsonArray)json.get(21)).get(1).getAsDouble();
        mLongtitude =((JsonArray)json.get(21)).get(2).getAsDouble();


    }





    public double getLatitude() {
        return mLatitude;
    }

    public void setLatitude(double mLatitude) {
        this.mLatitude = mLatitude;
    }

    public double getLongtitude() {
        return mLongtitude;
    }

    public void setLongtitude(double mLongtitude) {
        this.mLongtitude = mLongtitude;
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
