package com.twitter;

import java.util.List;

import twitter4j.Status;

public class TwitterRun {
	public static void main(String[] args) {
		CrweetsSearcher cs = new CrweetsSearcher();
		List<Status> ls = cs.searchTweetsByKeyword("thief");
		for (Status s : ls) {
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
}
