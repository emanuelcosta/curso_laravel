import { Component } from '@angular/core';
import { Post } from './post';
import { MatDialog, MatSnackBar } from "@angular/material";
import { PostDialogComponent } from './post-dialog/post-dialog.component';
import { LoginComponent } from './login-dialog/login.component';
import { PostService } from './post.service';
import { User } from './user';
import { UserService } from './user.service';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';
  private posts: Post[];
  private userLogado: User;

  constructor(public dialog: MatDialog, public postService: PostService, public userService: UserService, public msg: MatSnackBar) { }

  ngOnInit() {
    this.userLogado = this.userService.userLogado;
    this.posts = this.postService.posts;
  }

  openDialog(): void {
    if (!this.userLogado.id) {
      let msg = this.msg.open("Operação não permitida. Usuário não foi autenticado!", "Undo");
    } else {
      const dialogRef = this.dialog.open(PostDialogComponent, {
        width: '600px',
      });
      dialogRef.afterClosed().subscribe(
        (result) => {
          if (result) {
            this.postService.salvar(result.post, result.arquivo, this.userLogado);
            console.log(result);
          }
        }
      );
    }
  }

  openDialogLogin(): void {
    const dialogRef = this.dialog.open(LoginComponent, {
      width: '600px',
    });
    dialogRef.afterClosed().subscribe(
      (result) => {
        if (result) {
          console.log("modal dialog de login fechado");
        }
      }
    );
  }

  logout() {
    this.userService.logout();
  }

}
