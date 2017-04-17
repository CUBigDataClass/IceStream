package edu.colorado.plv.CrimeMap;

import java.util.ArrayList;
import java.util.HashMap;

import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;


/**
 * Created by Pezh on 3/1/17.
 */
public class Runner {

    public static void main(String[] args) throws Exception{
        Parser laParser = new Parser();
        ArrayList<Crime> crimes;
        crimes = laParser.parseToCrimeArray();
        int count = 0;
        
        
        //connect mongoDB
        try {      

        	MongoClientURI uri = new MongoClientURI("mongodb://icestream:cuicestream123@ds127300.mlab.com:27300/icestream");
        	MongoClient mongoClient = new MongoClient(uri);

            System.out.println("Database Connection Successful!");  
            DB db = mongoClient.getDB( "icestream" ); 
            
            DBCollection collection = db.getCollection("crimeCollection");
        	
            
            for (int i = 0; i < crimes.size(); i++) {
	            HashMap<String, Object> documentMap = new HashMap<String, Object>();
	            Crime crime = crimes.get(i); 
	            documentMap.put("Latitude", crime.mLatitude);
	            documentMap.put("Longtitude", crime.mLongtitude);
	            documentMap.put("Date", crime.mDate);
	            documentMap.put("CrimeType", crime.mCrimeType);
	            documentMap.put("Status", crime.mStatus);
	            documentMap.put("Location", crime.mLocation);
	             
	            collection.insert(new BasicDBObject(documentMap));
             
            }

            System.out.println("Insert finished");
            
        } catch (Exception e){  
           e.printStackTrace();
        }  
         
        
        
    }

}
