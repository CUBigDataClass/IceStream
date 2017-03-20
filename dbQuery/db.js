const credential = require('../Site/green_arrow_setting.json')

function queryDB(num){

	var mongojs = require('mongojs')

	var db = mongojs('mongodb://' + credential.db_account+':' + credential.db_password +'@'+ credential.db_url)
	var mycollection = db.collection(credential.db_collection)

	db.on('error', function (err) {
	    console.log('database error', err)
	})

	db.on('connect', function () {
	    console.log('database connected')
	})

	// find position
	var query = { Latitude: 1, Longtitude: 1 }
	var positionList = []
	mycollection.find({}, query).limit(num).skip(0, function (err, docs) { 
		//console.log(docs)
		var position
		for(var index in docs){ 
			var position = [ docs[index]["Latitude"], docs[index]["Longtitude"] ]
			//console.log(position)
			positionList.push(position)
		}
		console.log(positionList)

		db.close()
	})

	return positionList
}
queryDB(100)