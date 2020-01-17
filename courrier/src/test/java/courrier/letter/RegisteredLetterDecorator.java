package courrier.letter;

import courrier.content.Content;
import courrier.content.Text;

public class RegisteredLetterDecorator extends RegisteredLetter {
	int receptionCounter;
	Letter<?>letter;

	public RegisteredLetterDecorator(Letter<?> letter) {
		super(letter, "test");
		this.letter = letter;
		this.receptionCounter = 0;
	}
	public void sendAcknowledgementOfReceipt() {
		this.receptionCounter++;
		Content<String> text = new Text<>("Bien reçu");
		Letter<Content<String>> letter = new AcknowledgementOfReceipt<>(this.containedLetter.getRecipient(),this.containedLetter.getSender(),text,"test");
		this.containedLetter.getRecipient().sendLetter(letter);
	}

}
