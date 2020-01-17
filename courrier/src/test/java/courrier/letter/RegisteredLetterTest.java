package courrier.letter;

import static org.junit.Assert.assertEquals;

import org.junit.Before;
import org.junit.Test;

import courrier.City;
import courrier.Inhabitant;
import courrier.content.Content;
import courrier.content.Text;

public class RegisteredLetterTest extends LetterTest {
	private City city;
	private Inhabitant h1;
	private Inhabitant h2;
	private Content<String> content;

	@SuppressWarnings("unused")
	@Before
	public void before() {
		this.city = new City("Conakry");
		this.h1 = new Inhabitant("Diallo",city, 12.0f);
		this.h2 = new Inhabitant("Abdoul",city, 10.0f);
		this.content = new Text<>("Merci beaucoup");
	}

	@Override
	public Letter<?> getTestedLetter() {
	    Letter<Content<String>> l0 = new SimpleLetter<>(this.h1,this.h2,this.content,"test");
	    Letter<?> letter = new RegisteredLetter(l0, "test");
	    return letter;
	}

	@Test
	public void recevingRegistredLetterSendBackAccuseReception(){
	    Letter<Content<String>> l0 = new SimpleLetter<>(h1,h2,content,"test");
	    RegisteredLetterDecorator letter = new RegisteredLetterDecorator(l0);
			assertEquals(letter.receptionCounter, 0);
			this.h2.receiveLetter(letter);
			assertEquals(letter.receptionCounter, 1);

	}


}
