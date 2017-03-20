const credential = require('../../green_arrow_setting.json')

var mongojs = require('mongojs')
var db = mongojs('mongodb://' + credential.db_account+':' + credential.db_password +'@'+ credential.db_url)
var mycollection = db.collection(credential.db_collection)


db.on('error', (err) => {console.log('database error', err)})
db.on('connect', () => {console.log('database connected')})

function queryDB(num, callback){

	var query = { Latitude: 1, Longtitude: 1, Date: 1, CrimeType: 1}
	mycollection.find({}, query).limit(num).skip(0, function (err, docs) { 
		var data = [];
		for(var index in docs){
			data.push(docs[index])
		}
		db.close()
		callback(data)
	})

}
queryDB(5, (json) => { console.log(json) }
