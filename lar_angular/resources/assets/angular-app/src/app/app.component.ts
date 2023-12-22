import { Component } from '@angular/core';
import { Post } from './post';
import { MatDialog } from "@angular/material";
import { PostDialogComponent } from './post-dialog/post-dialog.component';
import { LoginComponent } from './login-dialog/login.component';
import {PostService} from './post.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';
  private posts: Post[];

  constructor(public dialog: MatDialog, public postService:PostService) { }

  ngOnInit(){
    this.posts = this.postService.posts;
    console.log(this.posts);
  }

  openDialog(): void {
    const dialogRef = this.dialog.open(PostDialogComponent, {
      width: '600px',
    });
    dialogRef.afterClosed().subscribe(
      (result) => {
        if (result) {
          this.postService.salvar(result.post, result.arquivo);
          console.log(result);
        }
      }
    );
  }

  openDialogLogin(): void {
    const dialogRef = this.dialog.open(LoginComponent, {
      width: '600px',
    });
    dialogRef.afterClosed().subscribe(
      (result) => {
        if (result) {
          console.log(result);
        }
      }
    );
  }

}
