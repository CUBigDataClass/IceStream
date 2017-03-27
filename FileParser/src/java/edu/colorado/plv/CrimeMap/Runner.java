package edu.colorado.plv.CrimeMap;

import java.util.ArrayList;

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
    }

}
