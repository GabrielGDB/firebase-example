(function(){
	
	var config = {
		apikey: "AIzaSyDdDHntmw3lwFrwnwhI-zvwaQzwc29UtBw",
		authDomain: "web-dev-ceca4.firebaseapp.com",
		databaseURL: "https://web-dev-ceca4.firebaseio.com",
		storageBucket: "web-dev-ceca4.appspot.com",
		
	};

	firebase.initializeApp(config);
	
	angular
		.module('web-dev',['firebase'])
		.controller('siteController',function($firebaseObject){
		const rootRef = firebase.database().ref().child('angular');
		const ref = rootRef.child('object');
		this.object = $firebaseObject(ref);
	});

}());
