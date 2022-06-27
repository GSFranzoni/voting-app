import React from "react";
import { Badge, Button, HStack, List, ListIcon, ListItem, useColorModeValue } from "@chakra-ui/react";
import { LinkIcon, StarIcon } from "@chakra-ui/icons";
import AppCard from "../Shared/AppCard";
import { IoMdSend } from "react-icons/io";
import { connector, PollProps } from "./props";
import { copyToClipboard } from "../../utils/Clipboard";
import useNotify from "../../hooks/Notify";

const Poll = ({ id, finishing, description, options, finished, finish }: PollProps) => {
    const color = useColorModeValue('black', 'white')
    const voteLink = `${window.location.origin}/polls/${id}/vote`
    const { NotifySuccess } = useNotify()
    return <AppCard title={description} color={color} position={'relative'} minWidth={['100%', '450px', '650px', '800px']}>
        <Badge
            variant={'solid'}
            borderRadius={8}
            p={1}
            colorScheme={finished? 'red': 'green'}
            position={'absolute'}
            size={'md'}
            right={6}
            top={10}
        >{ finished? 'Finished': 'In Progress'}</Badge>
        <List spacing={3} colorScheme={'blue'}>{options.map((option, index) =>
            <ListItem key={index} color={color}>
                <ListIcon as={StarIcon} color={'green.500'} />
                {option.description}
            </ListItem>)
        }</List>
        <HStack justifyContent={'end'} mt={8}>
            <Button
                size={'sm'}
                leftIcon={<LinkIcon />}
                variant={'ghost'}
                colorScheme={'green'}
                onClick={() => {
                    copyToClipboard(voteLink)
                    NotifySuccess('Vote Link copied to clipboard :)')
                }}>Copy Link</Button>
            {id && !finished && <Button
                size={'sm'}
                leftIcon={<IoMdSend />}
                variant={'solid'}
                colorScheme={'green'}
                isLoading={finishing}
                onClick={() => finish(id)}>Finish</Button>}
        </HStack>
    </AppCard>
}

export default connector(Poll)
