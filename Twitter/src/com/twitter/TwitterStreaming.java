package com.twitter;

import java.io.IOException;
import twitter4j.StallWarning;
import twitter4j.Status;
import twitter4j.StatusDeletionNotice;
import twitter4j.StatusListener;
import twitter4j.TwitterException;
import twitter4j.TwitterStream;
import twitter4j.TwitterStreamFactory;

public class TwitterStreaming {

	public static void main(String[] args) throws TwitterException, IOException{
	    StatusListener listener = new StatusListener(){
	        public void onStatus(Status s) {
	        	if (s.getPlace()!= null) {
					System.out.println();
					System.out.println("getUser(): " + s.getUser());
					System.out.println("getLang(): " + s.getLang());
					System.out.println("getText(): " + s.getText());
					System.out.println("getSource(): " + s.getSource());
					System.out.println("getCreatedAt(): " + s.getCreatedAt());
					System.out.println("getPlace(): " + s.getPlace());
					System.out.println("getGeoLocation(): " + s.getGeoLocation());
				}
	        }
	        public void onDeletionNotice(StatusDeletionNotice statusDeletionNotice) {}
	        public void onTrackLimitationNotice(int numberOfLimitedStatuses) {}
	        public void onException(Exception ex) {
	            ex.printStackTrace();
	        }
			@Override
			public void onScrubGeo(long arg0, long arg1) {
				// TODO Auto-generated method stub
				
			}
			@Override
			public void onStallWarning(StallWarning arg0) {
				// TODO Auto-generated method stub
				
			}
	    };
	    TwitterStream twitterStream = new TwitterStreamFactory().getInstance();
	    twitterStream.addListener(listener);
	    // sample() method internally creates a thread which manipulates TwitterStream and calls these adequate listener methods continuously.
	    twitterStream.sample();
	}

}
