import React from "react";
import {AbsoluteCenter, Divider, List, ListItem, Progress} from "@chakra-ui/react";
import AppCard from "../../components/Shared/AppCard";

const PollResultPage: React.FC = () => {
    return <AbsoluteCenter>
        <AppCard title={'Poll test'}>
            <List spacing={3}>
                <ListItem>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit
                    <Progress hasStripe value={50} my={2} />
                </ListItem>
                <Divider />
                <ListItem>
                    Assumenda, quia temporibus eveniet a libero incidunt suscipit
                    <Progress hasStripe value={10} my={2} />
                </ListItem>
                <Divider />
                <ListItem>
                    Quidem, ipsam illum quis sed voluptatum quae eum fugit earum
                    <Progress hasStripe value={5} my={2} />
                </ListItem>
                <Divider />
                <ListItem>
                    Quidem, ipsam illum quis sed voluptatum quae eum fugit earum
                    <Progress hasStripe value={20} my={2} />
                </ListItem>
                <Divider />
                <ListItem>
                    Quidem, ipsam illum quis sed voluptatum quae eum fugit earum
                    <Progress hasStripe value={15} my={2} />
                </ListItem>
            </List>
        </AppCard>
    </AbsoluteCenter>
}

export default PollResultPage
