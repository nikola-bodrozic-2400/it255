import {Component} from 'angular2/core';
import {HomeComponent} from  "./home/home.component";
@Component({
	selector: 'home',
	template: `
		<home></home>
	`,
	directives: [HomeComponent]
})
export class AppComponent {

}