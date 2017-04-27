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
public class DetroitCrimeLocationsProducer {
	public static void main(String args[]) throws InterruptedException, ExecutionException {
		Properties props = new Properties();
		props.put(ProducerConfig.BOOTSTRAP_SERVERS_CONFIG,"localhost:9092");
		props.put(ProducerConfig.VALUE_SERIALIZER_CLASS_CONFIG,StringSerializer.class.getName());
		props.put(ProducerConfig.KEY_SERIALIZER_CLASS_CONFIG,StringSerializer.class.getName());

		KafkaProducer<String,String> producer = new KafkaProducer<String,String>(props);
		
		// boolean sync = false;
		String topic="detroit_crimelocations";
		
		DatasetURLStreamReader dusr = new DatasetURLStreamReader("https://data.detroitmi.gov/resource/i9ph-uyrp.json");
		Iterator<String> it = dusr.lines.iterator();
		StringBuilder valueSB = null;
		while (it.hasNext()) {
			String line = it.next();
			 System.out.println(line);
			//producer.send(producerRecord).get();
			if (line.contains("latitude")) {
				int i0 = line.indexOf("\""), i1 = line.indexOf("\"", i0 + 1), 
						i2 = line.indexOf("\"", i1 + 1), i3 = line.indexOf("\"", i2 + 1);
				valueSB = new StringBuilder(line.substring(i2 + 1, i3));
			} else if (line.contains("longitude") && valueSB.length() >0){
				int i0 = line.indexOf("\""), i1 = line.indexOf("\"", i0 + 1), 
						i2 = line.indexOf("\"", i1 + 1), i3 = line.indexOf("\"", i2 + 1);
				valueSB.append(",").append(line.substring(i2 + 1, i3));
				ProducerRecord<String,String> producerRecord = new ProducerRecord<String,String>(topic, valueSB.toString());
				producer.send(producerRecord);
				valueSB = new StringBuilder();
			}
		}

		producer.close();
	}
}