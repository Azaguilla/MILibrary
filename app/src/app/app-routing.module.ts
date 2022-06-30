import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BooksToSellComponent } from './books-lists/components/books-to-sell/books-to-sell.component';
import { HomeComponent } from './home-page/components/home/home.component';
import { MyFriendsComponent } from './my-friends/my-friends.component';
import { MyLibraryComponent } from './books-lists/components/my-library/my-library.component';
import { MyWishlistComponent } from './books-lists/components/my-wishlist/my-wishlist.component';

const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'Ma Bibliothèque', component: MyLibraryComponent },
    { path: 'Ma liste d\'envies', component: MyWishlistComponent },
    { path: 'Mes livres en vente', component: BooksToSellComponent },
    { path: 'Mes amis', component: MyFriendsComponent }
];

@NgModule({
    imports: [
      RouterModule.forRoot(routes)
    ],
    exports: [
      RouterModule
    ]
  })
export class AppRoutingModule {}