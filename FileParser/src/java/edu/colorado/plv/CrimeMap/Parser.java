package edu.colorado.plv.CrimeMap;

import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonElement;
import com.google.gson.JsonParser;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;

/**
 * Created by Pezh on 2/26/17.
 */
public class Parser {
    JsonParser mJsonParser;
    public Parser(){
        mJsonParser = new JsonParser();

    }
    public ArrayList<Crime> parseToCrimeArray() throws Exception{

        InputStream is = new FileInputStream(getJsonFilePath());
        BufferedReader buf = new BufferedReader(new InputStreamReader(is));
        String line = buf.readLine();
        StringBuilder sb = new StringBuilder();

        while (line != null) {
            sb.append(line).append("\n");
            line = buf.readLine();
        }
        String fileAsString = sb.toString();
        JsonParser mJsonParser = new JsonParser();
        JsonArray array = mJsonParser.parse(fileAsString).getAsJsonObject().getAsJsonArray("data");

        ArrayList<Crime> crimes = new ArrayList<Crime>(array.size());
        for (int i = 0; i < array.size(); ++i) {
            crimes.add(new Crime((JsonArray) array.get(i)));
        }

        return crimes;
    }

    public static String getJsonFilePath(){
        return Parser.class.getResource("rows.json").getPath();

    }
}
