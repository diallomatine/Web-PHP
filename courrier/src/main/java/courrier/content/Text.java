package courrier.content;

public class Text<T> implements Content<T>{
	protected T text;
	
	/**
	 * Built the type text of content
	 * @param text the text to must be the content of this letter
	 */
	public Text(T text) {
		this.text = text;
	}
	

	/**
	 * @return the text content of this letter
	*/
	
	public  T getContent() {
		return this.text;
	}
}
