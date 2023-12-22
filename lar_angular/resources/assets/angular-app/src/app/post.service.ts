import { Injectable } from '@angular/core';
import { Post } from "./post";
import { HttpClient, HttpEvent, HttpEventType } from '@angular/common/http';
// @Injectable({
//   providedIn: 'root'
// })
@Injectable()
export class PostService {
  public posts: Post[] = [];
  public host = "http://localhost:8082/curso_laravel/lar_angular/public/"
  constructor(private http: HttpClient) {
    this.http.get(this.host + "/api/").subscribe(
      (posts: any[]) => {
        for (let p of posts) {
          this.posts.push(new Post(p.nome, p.titulo, p.subtitulo, p.email, p.mensagem, p.arquivo, p.id, p.likes));
        }
      }
    );
  }

  salvar(post: Post, file: File) {
    const uploadData = new FormData();
    uploadData.append("nome", post.nome);
    uploadData.append("titulo", post.titulo);
    uploadData.append("subtitulo", post.subtitulo);
    uploadData.append("email", post.email);
    uploadData.append("mensagem", post.mensagem);
    uploadData.append("arquivo", file);
    this.http.post(this.host + "/api", uploadData, { observe: 'events', reportProgress: true }).subscribe((event: any) => {
      if (event.type == HttpEventType.Response) {
        console.log(event);
        let p: any = event.body;
        this.posts.push(new Post(p.nome, p.titulo, p.subtitulo, p.email, p.mensagem, p.arquivo, p.id, p.likes));
      }
      if (event.type == HttpEventType.UploadProgress) {
        // console.log('UploadProgress');
        // console.log(event);
      }
    })
  }

  like(id: number) {
    this.http.get(this.host + 'api/like/' + id, { reportProgress: true, observe: 'events' })
      .subscribe((event: HttpEvent<any>) => {
        if (event.type == HttpEventType.Response) {
          let post_resposta = event.body;
          let p = this.posts.find((p) => p.id == id)
          p.likes = post_resposta.likes
        }
      });
  }

  delete(id: number) {
    this.http.delete(this.host + "api/destroy/" + id).subscribe(
      (event: HttpEvent<any>) => {
        let i = this.posts.findIndex((p) => p.id == id)
        if (i >= 0)
          this.posts.splice(i, 1)
        console.log(event);
      }
    );
  }
}
