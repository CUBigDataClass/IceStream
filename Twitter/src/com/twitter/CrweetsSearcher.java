package com.twitter;

import java.util.ArrayList;

import java.util.List;

import twitter4j.GeoLocation;
import twitter4j.GeoQuery;
import twitter4j.Place;
import twitter4j.Query;
import twitter4j.QueryResult;
import twitter4j.ResponseList;
import twitter4j.Status;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;
import twitter4j.conf.ConfigurationBuilder;

/*
 * GreenArrow project needs authentication information. Just ask Bryan: bo.cao-1@colorado.edu :)
 */

public class CrweetsSearcher {
	
	Twitter twitter = null;
	
	public CrweetsSearcher() {
		TwitterFactory tf = new TwitterFactory();
		this.twitter = tf.getInstance();
	}
	
	public List<Status> searchTweetsByKeyword(String keyword) {
		
		Query query = new Query(keyword);
		QueryResult result;
		List<Status> tweetsLs = new ArrayList<Status>();
		try {
			do {
				result = this.twitter.search(query);
				tweetsLs.addAll(result.getTweets());
			} while ((query = result.nextQuery()) != null);
		} catch (TwitterException te) {
			te.printStackTrace();
			System.out.println("Tweets search failed:" + te.getMessage());
		}
		return tweetsLs;
	}

}