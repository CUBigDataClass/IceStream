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
        for(int i = 0; i < crimes.size(); i++){
            if(crimes.get(i).mCrimeType.equals("\"BURGLARY\"")){
                System.out.println(crimes.get(i).mCrimeType);
                
                ++count;

            };
        }
        System.out.println(count);
        
        
        //connect mongoDB
        try{     
        	/*MongoCredential credential = MongoCredential.createCredential("icestream", "icestream", "cuicestream123");
        	MongoClient mongoClient = new MongoClient(new ServerAddress(), Arrays.asList(credential));*/
        	
        	
/*
            MongoClient mongoClient = new MongoClient("ds127300.mlab.com" , 27300);  
            System.out.println("Database Connection Successful!");  
            DB db = mongoClient.getDB( "icestream" ); */
            // insert data
            
            /*MongoClient mongoClient = new MongoClient(new ServerAddress(), 
                    Arrays.asList(MongoCredential.createCredential("icestream", "icestream", "cuicestream123".toCharArray())));
            
        	ServerAddress server = new ServerAddress("ds127300.mlab.com" , 27300);
        	MongoCredential credentials = MongoCredential.createCredential("icestream", "icestream", "cuicestream123".toCharArray())));
        	MongoClient mongoClient = new MongoClient(server, credentials);*/
        	
        	MongoClientURI uri = new MongoClientURI("mongodb://icestream:cuicestream123@ds127300.mlab.com:27300/icestream");
        	MongoClient mongoClient = new MongoClient(uri);
        	/*MongoDatabase db = mongoClient.getDatabase("yourdatabasename");
        	MongoCollection<Document> collection = db.getCollection("yourcollection");*/
        	
            System.out.println("Database Connection Successful!");  
            DB db = mongoClient.getDB( "icestream" ); 
            
            DBCollection collection = db.getCollection("crimeCollection");
        	
            
            //sorting data and insert to mongoDB
            for (int i=0; i<crimes.size(); i++){
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
            /*
            for (int i=0; i<crimes.size(); i++){
            	Crime crime = crimes.get(i); 
            	String json = "{ 'Latitude' : "+ crime.mLatitude +","+
                    "'Longtitude' : "+ crime.mLongtitude  +","+
                    "'Date' : "+ crime.mDate  +","+
                    "'CrimeType' : "+ crime.mCrimeType  +","+
                    "'Status' : "+ crime.mStatus  +","+
                    "'Location' : "+ crime.mLocation  +"}";
          
            	DBObject dbObject = (DBObject)JSON.parse(json);
            	collection.insert(dbObject);
            }*/
            //
            
           
            }catch(Exception e){  
             System.err.println( e.getClass().getName() + ": " + e.getMessage() );  
          }  
         
        
        
        
    }

}
