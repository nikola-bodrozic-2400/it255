import {Component} from 'angular2/core';
import {Http, HTTP_PROVIDERS} from 'angular2/http';
import 'rxjs/Rx';

@Component({
	selector: 'home',
	templateUrl: 'app/home/home.html'
})

export class HomeComponent{
	sobe: Object[];
	constructor(http: Http){
		http.get('http://localhost/MetHotels/index2.php').map(res => res.json()).subscribe(sobe => this.sobe = sobe);
	}
}