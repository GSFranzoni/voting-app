import React from 'react';
import './App.css';
import { Route, Routes } from "react-router-dom";
import MainLayout from "./layouts/MainLayout";
import HomePage from "./pages/Home";
import AuthPage from "./pages/Auth";
import NotFoundPage from "./pages/NotFound";
import CreatePoll from "./pages/CreatePoll";
import VotePage from "./pages/Vote";
import PollResultPage from "./pages/PollResult";
import { Provider as ReduxProvider } from "react-redux";
import { AppState } from "./store";
import { Store } from "redux";
import MyPolls from "./pages/MyPolls";
import NotificationHandler from "./components/NotificationHandler";
import AuthGuard from "./guards/Auth";

type AppProps = {
    store: Store<AppState>
}

const App: React.FC<AppProps> = ({ store }) => {
    return <ReduxProvider store={store}>
        <Routes>
            <Route path="/" element={<AuthGuard><MainLayout /></AuthGuard>}>
                <Route path="" element={<HomePage />} />
                <Route path="polls" element={<MyPolls />} />
                <Route path="polls/create" element={<CreatePoll />} />
                <Route path="polls/:id/vote" element={<VotePage />} />
                <Route path="polls/:id/result" element={<PollResultPage />} />
            </Route>
            <Route path="auth" element={<AuthPage />} />
            <Route path="*" element={<NotFoundPage />} />
        </Routes>
        <NotificationHandler />
    </ReduxProvider>
}

export default App;
