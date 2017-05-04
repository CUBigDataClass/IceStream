package com.kafka;

import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Properties;

import org.apache.kafka.clients.consumer.Consumer;
import org.apache.kafka.clients.consumer.ConsumerRecord;
import org.apache.kafka.clients.consumer.ConsumerRecords;
import org.apache.kafka.clients.consumer.KafkaConsumer;

import kafka.consumer.ConsumerConfig;
import kafka.consumer.ConsumerIterator;
import kafka.consumer.KafkaStream;
import kafka.javaapi.consumer.ConsumerConnector;

public class CrimeLocationConsumer {
	   public static void main(String[] args) throws Exception {
		  /*
	      if(args.length < 2){
	         System.out.println("Usage: consumer <topic> <groupname>");
	         return;
	      } */
	      
		  
		   
	      String topic = args[0].toString();
	      String group = args[1].toString();
	      Properties props = new Properties();
	      props.put("bootstrap.servers", "localhost:9092");
	      props.put("group.id", group);
	      props.put("enable.auto.commit", "true");
	      props.put("auto.commit.interval.ms", "1000");
	      props.put("session.timeout.ms", "30000");
	      props.put("key.deserializer",          
	         "org.apache.kafka.common.serializa-tion.StringDeserializer");
	      props.put("value.deserializer", 
	         "org.apache.kafka.common.serializa-tion.StringDeserializer");
	      KafkaConsumer<String, String> consumer = new KafkaConsumer<String, String>(props);
	      
	      consumer.subscribe(Arrays.asList(topic));
	      System.out.println("Subscribed to topic " + topic);
	      int i = 0;
	         
	      while (true) {
	         ConsumerRecords<String, String> records = consumer.poll(100);
	            for (ConsumerRecord<String, String> record : records)
	               System.out.printf("offset = %d, key = %s, value = %s\n", 
	               record.offset(), record.key(), record.value());
	      }     
	   }  
	}