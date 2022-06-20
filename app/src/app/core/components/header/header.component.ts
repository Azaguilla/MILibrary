import { Component, OnInit } from '@angular/core';
import { faSliders } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  faSliders = faSliders;
  constructor() { }

  ngOnInit(): void {
  }

}
