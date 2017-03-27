package com;
import org.apache.spark.sql.Dataset;
import org.apache.spark.sql.Row;
import org.apache.spark.sql.SparkSession;

public class JavaDatasetQuery {

	public static void main(String[] args) {
		SparkSession spark = SparkSession
			      .builder()
			      .appName("JavaDatasetQuery")
			      .getOrCreate();
		
		Dataset<Row> lines = spark
				.readStream()
				.format("json")
				.json(path)
				.load();
	}

}
