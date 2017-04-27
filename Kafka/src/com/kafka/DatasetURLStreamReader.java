package com.kafka;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class DatasetURLStreamReader {

	URL url;
	List<String> lines;
	
	public DatasetURLStreamReader(String urlStr) {
		try {
			this.url = new URL(urlStr);
		} catch (MalformedURLException mue) {
			mue.printStackTrace();
			System.out.println("MalformedURLException");
		}
		this.lines = getLines();
	}
	
	private List<String> getLines() {
		List<String> ls = new ArrayList<String>();
		try {
	        // Read all the text returned by the server
	        BufferedReader in = new BufferedReader(new InputStreamReader(this.url.openStream()));
	        String str;
	        while ((str = in.readLine()) != null) {
	        	ls.add(str);
	        }
	        in.close();
	    } catch (MalformedURLException e) {
	    	System.out.println("MalformedURLException");
	    } catch (IOException e) {
	    	System.out.println("IOException");
	    }
		return ls;
	}

}
