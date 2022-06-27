import React from "react";
import {AbsoluteCenter, Tab, TabList, TabPanel, TabPanels, Tabs} from "@chakra-ui/react";
import AppCard from "../../components/Shared/AppCard";
import LoginForm from "../../components/LoginForm";
import RegisterForm from "../../components/RegisterForm";

const AuthPage: React.FC = () => {
    return <AbsoluteCenter>
        <AppCard title={'EzPoll :)'}>
            <Tabs colorScheme={'green'}>
                <TabList>
                    <Tab>Login</Tab>
                    <Tab>Register</Tab>
                </TabList>
                <TabPanels>
                    <TabPanel>
                        <LoginForm />
                    </TabPanel>
                    <TabPanel>
                        <RegisterForm />
                    </TabPanel>
                </TabPanels>
            </Tabs>
        </AppCard>
    </AbsoluteCenter>
}

export default AuthPage
