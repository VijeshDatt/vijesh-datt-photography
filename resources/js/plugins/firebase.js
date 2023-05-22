// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDaA5qf_A3j_KCXfw_Tv8_1wpWfUW5KgCc",
  authDomain: "vijesh-datt-photography.firebaseapp.com",
  projectId: "vijesh-datt-photography",
  storageBucket: "vijesh-datt-photography.appspot.com",
  messagingSenderId: "767428216075",
  appId: "1:767428216075:web:8b48775466fb7e315bce0e",
  measurementId: "G-QBJY8Y9J3K",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
import { getStorage } from "firebase/storage";
const storage = getStorage(app);

export { storage };
