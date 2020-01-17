package courrier.letter;



import courrier.Inhabitant;
import courrier.content.Content;
/*
J'ai enlevé implements Content<C>
*/
public abstract class Letter<C extends Content<?>>{
	protected Inhabitant receiver;
	protected Inhabitant sender;
	protected C content;
	protected String nameLetter;

	/**
	 * built a letter with its caracteristiques
	 * @param sender the sender of the letter
	 * @param receiver the receiver of the letter
	 * @param content the content of the letter
	 */
	public Letter(Inhabitant sender, Inhabitant receiver, C content, String nameLetter){
		this.receiver = receiver;
		this.sender=sender;
		this.content=content;
		this.nameLetter=nameLetter;
	}
	public Letter(){
		this.receiver = null;
		this.sender=null;
		this.content=null;
	}
	/**
	 * @return the receiver of the letter
	*/
	public Inhabitant getRecipient() {
		return this.receiver;
	}
	/**
	 * @return the sender of the letter
	*/
	public Inhabitant getSender() {
		return this.sender;
	}
	/**
	 * @return the content of the letter
	*/
	public C getContent() {
		return this.content;
	}
	/**
	 * each reception of a letter, this action is execute
	*/
	public abstract void action();

	/**
	 * @return the price of sending a letter
	 */
	public abstract float getCost();

	/**
	*@return the toString of the letter
	*/
	public abstract String toString();

	/**
	*@return the name of the letter
	*/
	public String getNameLetter(){
		return this.nameLetter;
	}

}
