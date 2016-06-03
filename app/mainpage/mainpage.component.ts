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
	korisnici: Object[];
	constructor(http: Http){
		http.get('korisnici.json')
		.map(res => res.json())
		.subscribe(korisnici => this.korisnici = korisnici);
	}
}
