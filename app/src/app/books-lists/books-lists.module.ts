import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BooksToSellComponent } from './components/books-to-sell/books-to-sell.component';
import { MyLibraryComponent } from './components/my-library/my-library.component';
import { MyWishlistComponent } from './components/my-wishlist/my-wishlist.component';



@NgModule({
  declarations: [
    BooksToSellComponent,
    MyLibraryComponent,
    MyWishlistComponent
  ],
  imports: [
    CommonModule
  ],
  exports: [
    BooksToSellComponent,
    MyLibraryComponent,
    MyWishlistComponent

  ]
})
export class BooksListsModule { }
