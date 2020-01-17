package courrier.letter;
import java.util.*;
import java.util.regex.*;

public class ScannerString {
	private static final Scanner scanner = new Scanner(System.in);

	/**
	 * read a string betwen yes or no from standard input
	 * input is repeated as long as it is not correct

	 * @return the valid read input
	 */
	public static String readString() {
		String input = "a";

		while (input != "yes" || input != "no") {
			if (input == "yes") {
				System.out.println("c'est vrai");
			}
			else{
				System.out.println("c'est pas vrai");
			}
			System.out.print("your choice (yes or no ? )");
			input = scanner.nextLine();
				// boolean b = input != "yes" || input != "no";

		}
		return input;
	}


}
