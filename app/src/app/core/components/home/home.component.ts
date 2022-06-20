import { Component, OnInit } from '@angular/core';
import { faHeart, faBook, faHandshake, faPeopleGroup } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  faHeart = faHeart;
  faBook = faBook;
  faHandshake = faHandshake;
  faPeopleGroup = faPeopleGroup;


  constructor() { }

  ngOnInit(): void {
  }

}
