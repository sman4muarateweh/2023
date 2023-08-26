use reqwest;
#[tokio::main]
async fn main() -> Result<(), reqwest::Error> {
    let url = "vote/index.php";
    let response = reqwest::get(url).await?;
    let body = response.text().await?;
    println!("Hasil:\n{}", body);
    Ok(())
}
