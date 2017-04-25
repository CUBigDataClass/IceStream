package com;

import java.util.ArrayList;
import java.util.List;

import twitter4j.Query;
import twitter4j.QueryResult;
import twitter4j.Status;
import twitter4j.Twitter;
import twitter4j.TwitterException;
import twitter4j.TwitterFactory;

/*
 * GreenArrow project needs authentication information. Just ask Bryan: bo.cao-1@colorado.edu :)
 */

public class CrweetsSearcher {

	public static List<Status> searchTweetsByKeyword(String keyword){
        Twitter twitter = new TwitterFactory().getInstance();
        Query query = new Query(keyword);
        QueryResult result;
        List<Status> tweetsLs = new ArrayList<Status>();
        try {
            do {
                result = twitter.search(query);
                tweetsLs.addAll(result.getTweets());
            } while ((query = result.nextQuery()) != null);
        } catch (TwitterException te) {
            te.printStackTrace();
            System.out.println("Tweets search failed:" + te.getMessage());
        }
        return tweetsLs;
    }
}