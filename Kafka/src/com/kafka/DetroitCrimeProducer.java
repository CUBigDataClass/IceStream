package com.kafka;

import java.util.Iterator;

import java.util.Properties;
import java.util.concurrent.ExecutionException;

import org.apache.kafka.clients.producer.KafkaProducer;
import org.apache.kafka.clients.producer.ProducerConfig;
import org.apache.kafka.clients.producer.ProducerRecord;
import org.apache.kafka.common.serialization.StringSerializer;

/**
 * Modified from https://github.com/CameronGregory/kafka/blob/master/TestProducer.java
 */
public class DetroitCrimeProducer {
	public static void main(String args[]) throws InterruptedException, ExecutionException {
		Properties props = new Properties();
		props.put(ProducerConfig.BOOTSTRAP_SERVERS_CONFIG,"localhost:9092");
		props.put(ProducerConfig.VALUE_SERIALIZER_CLASS_CONFIG,StringSerializer.class.getName());
		props.put(ProducerConfig.KEY_SERIALIZER_CLASS_CONFIG,StringSerializer.class.getName());

		KafkaProducer<String,String> producer = new KafkaProducer<String,String>(props);
		
		// boolean sync = false;
		String topic="detroit_crime";
		
		while (true) {
			DatasetURLStreamReader dusr = new DatasetURLStreamReader("https://data.detroitmi.gov/resource/i9ph-uyrp.json");
			Iterator<String> it = dusr.lines.iterator();
			StringBuilder valueSB = null;
			while (it.hasNext()) {
				String line = it.next();
				ProducerRecord<String,String> producerRecord = new ProducerRecord<String,String>(topic, line);
				producer.send(producerRecord);
			}
		}
		
		
		
		
//		producer.close();
	}
}