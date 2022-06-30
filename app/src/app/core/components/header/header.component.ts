import { Component, OnInit } from '@angular/core';
import { faSliders } from '@fortawesome/free-solid-svg-icons';
import { Router } from '@angular/router';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  faSliders = faSliders;
  constructor(private router: Router) { }

  ngOnInit(): void {
  }
  
  onHome() {
    this.router.navigateByUrl('Mes livres en vent');
  }
}
