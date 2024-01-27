import { Injectable } from '@angular/core';
import { User } from './user';
import { HttpClient, HttpEventType, HttpHeaders } from '@angular/common/http';
import { MatSnackBar } from '@angular/material';
@Injectable()
export class UserService {
  public userLogado: User = new User("","");
  private host: string = "http://localhost/curso_laravel/lar_angular/public";

  constructor(private http: HttpClient, public snackBar: MatSnackBar) {

  }

  login(user: User) {
    const formData = new FormData();
    formData.append('email', user.email);
    formData.append('password', user.password);
    this.http.post(this.host + '/api/auth/login', formData, { observe: 'events', responseType:"json", reportProgress: true}).subscribe(
      (event: any) => {
        console.log(event);
        if(event.type === HttpEventType.ResponseHeader) {
          console.log(event.status);
          if (event.status === 401) {
            const msg = this.snackBar.open(event.statusText, "Undo");
          }
        }

        if(event.type == HttpEventType.Response){
          const body = event.body;
          this.userLogado.name = body.name;
          this.userLogado.email = body.email;
          this.userLogado.id = body.id;
          this.userLogado.token = body.token;
        }

      }

    )
  }

  logout() {
    let cabecalho = new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${this.userLogado.token}`
    });
    let formData = new FormData();
    formData.append("email", this.userLogado.email);
    this.http.post(this.host+'/api/auth/logout', formData, {headers: cabecalho, observe: "events"}).subscribe(
      (event: any) => {
        this.userLogado = new User("","");
      }
    )

    console.log("saindo");
  }
}
