import java.io.IOException;
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.Scanner;

public class RestCountriesProgram {

	public static void main(String[] args) {		
		System.out.println("Enter country name:");
		
		String input = extracted().nextLine();
		String url = "https://restcountries.com/v3.1/name/"+input;
		
		HttpRequest getRequest = HttpRequest.newBuilder()
				.uri(URI.create(url))
				.method("GET", HttpRequest.BodyPublishers.noBody())
				.build();
					
		HttpResponse<String> response = null;
						
		try {
			response = HttpClient.newHttpClient().send(getRequest, HttpResponse.BodyHandlers.ofString());
		} catch (IOException e) {
			e.printStackTrace();
		} catch (InterruptedException e) {
			e.printStackTrace();
		}
	
		System.out.println(response.body());		
	}

	private static Scanner extracted() {
		return new Scanner(System.in);
	
	}
}
