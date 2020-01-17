package courrier.letter;


public class UrgentLetter extends DecoratingLetter {
	protected Letter<?> containedLetter;

	@SuppressWarnings("unchecked")
	public UrgentLetter(Letter<?> letter, String nameLetter) {
		super(letter, nameLetter);
		this.containedLetter = letter;
	}
	public UrgentLetter() {
		super();
	}
	@Override
	public void action() {
		this.containedLetter.action();
	}

	@Override
	public float getCost() {
		return this.containedLetter.getCost()*2;
	}

	public String toString() {
		return super.toString() + "urgent";
	}

}
