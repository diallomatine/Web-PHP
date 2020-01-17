package courrier.letter;

import static org.junit.Assert.assertEquals;

import org.junit.Test;

import courrier.City;
import courrier.Inhabitant;

public abstract class LetterTest {

	public abstract Letter<?> getTestedLetter();

	@Test
	public void receivingLetterDoesAction() {
			Letter<?> letterToTest = this.getTestedLetter();
			TestedLetter<?> letter = new TestedLetter<>(letterToTest);
			assertEquals(letter.actionCounter, 0);
			City city = new City("Conakry");
			Inhabitant receiver = new Inhabitant("Abdoul", city, 3.5f);
			receiver.receiveLetter(letter);
			assertEquals(letter.actionCounter, 1);
	}




}
