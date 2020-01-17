package courrier.letter;

import courrier.Inhabitant;
import courrier.content.Content;

public abstract class DecoratingLetter<C extends Content<?>> extends Letter<C> {
	protected Letter<?>containedLetter;
	protected String getNameLetter;

	@SuppressWarnings("unchecked")
	public DecoratingLetter(Letter<?> containedLetter, String nameLetter) {
		super(containedLetter.getSender(), containedLetter.getRecipient(), (C)containedLetter.getContent(), containedLetter.getNameLetter());
		this.containedLetter = containedLetter;
		this.nameLetter=nameLetter;
	}
	public DecoratingLetter() {
		super();
	}
	public Inhabitant getRecipient() {
		return this.containedLetter.getRecipient();
	}

	public Inhabitant getSender() {
		return this.containedLetter.getSender();
	}
	@SuppressWarnings("unchecked")
	public C getCotent() {
		return (C)this.containedLetter.getContent();
	}

	@Override
	public void action() {
		this.containedLetter.action();
	}

	@Override
	public float getCost() {
		return this.containedLetter.getCost();
	}
	public String getNameLetter(){
		return this.nameLetter;
	}
	@Override
	public String toString() {
		return this.containedLetter.toString()+" ";
	}

}
