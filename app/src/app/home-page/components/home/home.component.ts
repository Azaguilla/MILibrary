import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
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

  constructor(private router: Router) { }

  ngOnInit(): void {
  }

  onMyLibrary() {
    this.router.navigateByUrl('Ma Bibliothèque');
}

  onMyWishlist() {
  this.router.navigateByUrl('Ma liste d\'envies');
}

  onBookToSend() {
  this.router.navigateByUrl('Mes livres en vente');
}

  onMyFriendsC() {
  this.router.navigateByUrl('Mes amis');
}

}
