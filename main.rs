use actix_web::{get, HttpResponse, HttpServer, Responder, web};
use askama::Template;

#[derive(Template)]
#[template(path = "index.html")]
struct IndexTemplate;

#[get("/")]
async fn index() -> impl Responder {
    let template = IndexTemplate {};
    HttpResponse::Ok().content_type("text/html").body(template.render().unwrap())
}

#[actix_web::main]
async fn main() -> std::io::Result<()> {
    HttpServer::new(|| {
        actix_web::App::new()
            .service(index)
            .service(web::resource("/static/{filename:.*}").route(web::get().to(|filename: web::Path<String>| {
                HttpResponse::Ok().body(format!("Serving static file: {}", filename))
            })))
    })
    .bind("127.0.0.1:8080")?
    .run()
    .await
}
