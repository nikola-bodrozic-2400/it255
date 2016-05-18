import { Component, Directive } from 'angular2/core';
import {Http, HTTP_PROVIDERS} from 'angular2/http';
import {SearchPipe} from 'app/pipe/search';
import 'rxjs/Rx';


@Component({ 
  pipes: [SearchPipe],
  selector: 'MainPage', 
  templateUrl: 'app/mainpage/mainpage.html'
})

export class MainPageComponent { 
	name:String = "";
	sobe: Object[];
	constructor(http: Http){
		http.get('http://localhost/MetHotels/index2.php')
		.map(res => res.json())
		.subscribe(sobe => this.sobe = sobe);
	}
}
