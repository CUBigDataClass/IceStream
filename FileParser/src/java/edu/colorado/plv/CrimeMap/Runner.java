package edu.colorado.plv.CrimeMap;

import java.util.ArrayList;

/*import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;*/

/**
 * Created by Pezh on 3/1/17.
 */
public class Runner {

    public static void main(String[] args) throws Exception{
        Parser nycParser = new Parser();
        ArrayList<Crime> crimes;
        crimes = nycParser.parseToCrimeArray();
        int count = 0;
        for(int i = 0; i < crimes.size(); i++){
            if(crimes.get(i).mCrimeType.equals("\"FORGERY\"")){
                System.out.println(crimes.get(i).mCrimeType);
                ++count;

            };
        }
        System.out.println(count);
        System.out.println(crimes.get(0));
    	
    	/*try{     
        	
        	MongoClientURI uri = new MongoClientURI("mongodb://icestream:cuicestream123@ds127300.mlab.com:27300/icestream");
        	MongoClient mongoClient = new MongoClient(uri);
        	
        	
            System.out.println("Database Connection Successful!");  
            DB db = mongoClient.getDB( "icestream" ); 
            
            DBCollection collection = db.getCollection("crimeCollection");
            System.out.println("Update finished");
            
           
            }catch(Exception e){  
             System.err.println( e.getClass().getName() + ": " + e.getMessage() );  
          }*/
    }

}
