package courrier.letter;

import courrier.content.Content;
import courrier.content.Text;


public class RegisteredLetter extends DecoratingLetter {
	protected Letter<?> containedLetter;

	@SuppressWarnings("unchecked")
	public RegisteredLetter(Letter<?> letter, String nameLetter) {
		super(letter, nameLetter);
		this.containedLetter = letter;
	}
	public RegisteredLetter() {
		super();
	}
	@Override
	public void action() {
		this.containedLetter.action();
		this.sendAcknowledgementOfReceipt();
	}
	public void sendAcknowledgementOfReceipt() {
		Content<String> text = new Text<>("Bien reçu");
		Letter<Content<String>> letter = new AcknowledgementOfReceipt<>(this.containedLetter.getRecipient(),this.containedLetter.getSender(),text,this.containedLetter.getNameLetter());
		this.containedLetter.getRecipient().sendLetter(letter);
	}

	@Override
	public float getCost() {
		return this.containedLetter.getCost()*1.15f;
	}
	public String toString() {
		return super.toString() + " recommande ";
	}

}
