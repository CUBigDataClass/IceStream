import com.google.gson.Gson;
import com.google.gson.JsonArray;
import com.google.gson.JsonParser;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.InputStream;
import java.io.InputStreamReader;

/**
 * Created by Pezh on 2/26/17.
 */
public class Parser {
    public static void main(String[] args) throws Exception{
        Gson gson = new Gson();
        JsonParser j = new JsonParser();
        InputStream is = new FileInputStream(getJsonFilePath());
        BufferedReader buf = new BufferedReader(new InputStreamReader(is));
        String line = buf.readLine();
        StringBuilder sb = new StringBuilder();
        while(line != null){
            sb.append(line).append("\n");
            line = buf.readLine();
        }
        String fileAsString = sb.toString();

        JsonArray array = j.parse(fileAsString).getAsJsonObject().getAsJsonArray("data");
        JsonArray single = (JsonArray) array.get(0);
        // DEBUG AT THIS POINT

        System.out.println(single.get(16));

    }

    public static String getJsonFilePath(){
        return Parser.class.getResource("rows.json").getPath();
    }
}
